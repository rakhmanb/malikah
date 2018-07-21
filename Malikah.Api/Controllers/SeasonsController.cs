using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Malikah.Api.Data;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

namespace Malikah.Api.Controllers
{
    [Produces("application/json")]
    [Route("api/Seasons")]
    public class SeasonsController : Controller
    {
        private IMalikahRepository _repo;

        public SeasonsController(IMalikahRepository malikahRepository)
        {
            _repo = malikahRepository;
        }

        [HttpGet]
        public IActionResult Get()
        {
            return Ok(_repo.GetAllSeasons());
        }
    }
}