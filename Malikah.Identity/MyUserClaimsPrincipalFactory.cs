using IdentityModel;
using Malikah.Identity.Models;
using Microsoft.AspNetCore.Identity;
using Microsoft.Extensions.Options;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Claims;
using System.Threading.Tasks;

namespace Malikah.Identity
{
    public class MyUserClaimsPrincipalFactory : UserClaimsPrincipalFactory<ApplicationUser, IdentityRole>
    {
        public MyUserClaimsPrincipalFactory(
            UserManager<ApplicationUser> userManager,
            RoleManager<IdentityRole> roleManager,
            IOptions<IdentityOptions> optionsAccessor)
            : base(userManager, roleManager, optionsAccessor)
        {
        }

        protected override async Task<ClaimsIdentity> GenerateClaimsAsync(ApplicationUser user)
        {
            var identity = await base.GenerateClaimsAsync(user);
            identity.AddClaim(new Claim("given_name", user.FirstName ?? ""));
            identity.AddClaim(new Claim("family_name", user.LastName ?? ""));

            IList<string> roles = await UserManager.GetRolesAsync(user);

            var rolesWords = String.Join(",", roles.ToArray());

            identity.AddClaim(new Claim(JwtClaimTypes.Role, rolesWords ?? ""));

            return identity;
        }
    }
}
