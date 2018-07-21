using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;

namespace Malikah.Controllers
{
    [Authorize(Roles = "Admin,Manager")]
    public class ItemsController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Add()
        {
            ViewData["ReturnUrl"] = "http://localhost";
            return View();
        }
    }
}