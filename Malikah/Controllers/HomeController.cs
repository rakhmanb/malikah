using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Malikah.Models;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Authentication;
using System.Net.Http;
using Newtonsoft.Json.Linq;
using IdentityModel.Client;
using IdentityModel;

namespace Malikah.Controllers
{
    [Authorize (Roles = "Admin,Manager")]
    public class HomeController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }

        private IActionResult StartAuthentication()
        {
            var request = new RequestUrl("http://localhost:5000");
            var url = request.CreateAuthorizeUrl(
                clientId: "mvc",
                scope: "profile openid",
                responseType: OidcConstants.ResponseTypes.CodeIdToken,
                responseMode: OidcConstants.ResponseModes.FormPost,
                redirectUri: "http://localhost:5002/signin-oidc",
                state: CryptoRandom.CreateUniqueId(),
                nonce: CryptoRandom.CreateUniqueId(),
                prompt: "none"
                );

            return Redirect(url);
        }

            public async Task Logout()
        {
            await HttpContext.SignOutAsync("Cookies");
            await HttpContext.SignOutAsync("oidc");
        }

        public IActionResult Error()
        {
            return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
        }

        public async Task<IActionResult> CallApiUsingUserAccessToken()
        {
            var accessToken = await HttpContext.GetTokenAsync("access_token");

            var client = new HttpClient();
            client.SetBearerToken(accessToken);
            var content = await client.GetStringAsync("http://localhost:5003/api/items");

            ViewBag.Json = JArray.Parse(content).ToString();
            return View("json");
        }

        public async Task<IActionResult> CallApiUsingIdentityUserAccessToken()
        {
            var accessToken = await HttpContext.GetTokenAsync("access_token");

            var client = new HttpClient();
            client.SetBearerToken(accessToken);
            var content = await client.GetStringAsync("http://localhost:5003/api/collections");

            ViewBag.Json = JArray.Parse(content).ToString();
            return View("json");
        }
    }
}
