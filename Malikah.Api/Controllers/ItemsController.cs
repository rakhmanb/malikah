using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Threading.Tasks;
using Malikah.Api.Data;
using Malikah.Api.Data.Entities;
using Malikah.Api.Models;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

namespace Malikah.Api.Controllers
{
    [Produces("application/json")]
    [Route("api/Items")]
    [Authorize]
    public class ItemsController : Controller
    {
        private IMalikahRepository _repo;

        private readonly IHostingEnvironment _appEnvironment;

        public ItemsController(IMalikahRepository malikahRepository, IHostingEnvironment hostingEnvironment)
        {
            _repo = malikahRepository;

            _appEnvironment = hostingEnvironment;
        }

        [HttpGet]
        public IActionResult Get()
        {
            return Ok(_repo.GetAllItems());
        }

        [HttpPost]
        public async Task<IActionResult> Post([FromBody]ItemViewModel itemViewModel)
        {
            Item item = new Item();
            item.AvailableInventory = itemViewModel.AvailableInventory;
            item.CategoryId = itemViewModel.CategoryId;
            item.CollectionId = itemViewModel.CollectionId;
            item.Description = itemViewModel.Description;
            item.Name = itemViewModel.Name;
            item.Price = itemViewModel.Price;
            item.Sku = itemViewModel.Sku;

            var files = HttpContext.Request.Form.Files;
            foreach (var Image in files)
            {
                if (Image != null && Image.Length > 0)
                {
                    var file = Image;

                    var uploads = Path.Combine(_appEnvironment.WebRootPath, "uploads\\img");
                    if (file.Length > 0)
                    {
                        var fileName = Guid.NewGuid().ToString().Replace("-", "") + Path.GetExtension(file.FileName);
                        using (var fileStream = new FileStream(Path.Combine(uploads, fileName), FileMode.Create))
                        {
                            await file.CopyToAsync(fileStream);
                        }

                    }
                }
            }

            return Ok();

        }
    }
}