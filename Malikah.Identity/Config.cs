using IdentityModel;
using IdentityServer4;
using IdentityServer4.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Claims;
using System.Threading.Tasks;
using static IdentityServer4.IdentityServerConstants;

namespace Malikah.Identity
{
    public class Config
    {
        // scopes define the resources in your system
        public static IEnumerable<IdentityResource> GetIdentityResources()
        {
            return new List<IdentityResource>
            {
                new IdentityResources.OpenId(),
                new IdentityResources.Profile(),
                rolesResource
            };
        }

        public static IEnumerable<ApiResource> GetApiResources()
        {
            return new List<ApiResource>
            {
                new ApiResource("api1", "My API", new List<string>() { ClaimTypes.Role }),

            };
        }

        private static IdentityResource rolesResource = new IdentityResource
        {
            Name = "roles",
            DisplayName = "Roles",
            Description = "Allow the service access to your user roles.",
            UserClaims = new[] { JwtClaimTypes.Role, ClaimTypes.Role },
            ShowInDiscoveryDocument = true,
            Required = true,
            Emphasize = true
        };

        // clients want to access resources (aka scopes)
        public static IEnumerable<Client> GetClients()
        {
            // client credentials client
            return new List<Client>
            {
                new Client
                {
                    ClientId = "client",
                    AllowedGrantTypes = GrantTypes.ClientCredentials,

                    ClientSecrets =
                    {
                        new Secret("secret".Sha256())
                    },
                    AllowedScopes = { "api1" }
                },

                // resource owner password grant client
                new Client
                {
                    ClientId = "ro.client",
                    AllowedGrantTypes = GrantTypes.ResourceOwnerPassword,

                    ClientSecrets =
                    {
                        new Secret("secret".Sha256())
                    },
                    AllowedScopes = { "api1" }
                },

                // OpenID Connect hybrid flow and client credentials client (MVC)
                new Client
                {
                    ClientId = "mvc",
                    ClientName = "MVC Client",
                    AllowedGrantTypes = GrantTypes.HybridAndClientCredentials,

                    RequireConsent = false,

                    ClientSecrets =
                    {
                        new Secret("secret".Sha256())
                    },

                    FrontChannelLogoutUri = "http://localhost:5002/signout-oidc",

                    RedirectUris = {
                        "http://localhost:5002/signin-oidc",
                        "http://malikahatelier-test.com/testphp.php",
                        "http://malikahatelier-test.com/logout-oidc.php",
                        "http://malikah-linux.azurewebsites.net/testphp.php",
                        "http://malikah-linux.azurewebsites.net/logout-oidc.php",
                    },
                    PostLogoutRedirectUris = {
                        "http://localhost:5002/signout-callback-oidc",
                        "http://malikahatelier-test.com/testout.php",
                        "http://malikah-linux.azurewebsites.net/testout.php"
                    },

                    AllowedScopes =
                    {
                        IdentityServerConstants.StandardScopes.OpenId,
                        IdentityServerConstants.StandardScopes.Profile,
                        "api1",
                        "roles"
                    },
                    AllowOfflineAccess = true,
                    AlwaysSendClientClaims = true
                },

                new Client
                {
                    ClientId = "php",
                    ClientName = "PHP Client",
                    AllowedGrantTypes = GrantTypes.HybridAndClientCredentials,

                    RequireConsent = false,

                    ClientSecrets =
                    {
                        new Secret("malikah1gr8".Sha256())
                    },

                    FrontChannelLogoutUri = "http://localhost:8080/signout-callback-oidc.php",

                    RedirectUris = {
                        "http://localhost:8080/login-oidc.php",
                        "http://localhost:8080/logout-oidc.php",
                        "http://malikah-linux.azurewebsites.net/login-oidc.php",
                        "http://malikah-linux.azurewebsites.net/logout-oidc.php"
                    },
                    PostLogoutRedirectUris = {
                        "http://localhost:8080/signout-callback-oidc.php",
                        "http://malikah-linux.azurewebsites.net/logout-oidc.php"
                    },

                    AllowedScopes =
                    {
                        IdentityServerConstants.StandardScopes.OpenId,
                        IdentityServerConstants.StandardScopes.Profile,
                        "api1",
                        "roles"
                    },
                    AllowOfflineAccess = true,
                    AlwaysSendClientClaims = true
                },

                // JavaScript Client
                new Client
                {
                    ClientId = "js",
                    ClientName = "JavaScript Client",
                    AllowedGrantTypes = GrantTypes.Implicit,
                    AllowAccessTokensViaBrowser = true,

                    RedirectUris = { "http://localhost:5002/signin-oidc",
                    "http://malikahatelier-test.com/testphp.php",
                    "http://malikahatelier-test.com/logout-oidc.php",
                    "http://malikah-linux.azurewebsites.net/testphp.php",
                    "http://malikah-linux.azurewebsites.net/logout-oidc.php" },
                    PostLogoutRedirectUris = { "http://localhost:5002/signout-callback-oidc",
                        "http://malikahatelier-test.com/testout.php",
                        "http://malikah-linux.azurewebsites.net/testout.php" },
                    AllowedCorsOrigins = { "http://localhost:5002","http://malikahatelier-test.com", "http://malikah-linux.azurewebsites.net", "https://malikah-linux.azurewebsites.net" },

                    AllowedScopes =
                    {
                        IdentityServerConstants.StandardScopes.OpenId,
                        IdentityServerConstants.StandardScopes.Profile,
                        "api1"
                    },
                }
            };
        }
    }
}
