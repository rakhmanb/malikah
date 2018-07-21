using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Malikah.Api.Data.Entities;
using Microsoft.EntityFrameworkCore;
using MySql.Data.MySqlClient;

namespace Malikah.Api.Data
{
    public class MalikahRepository : IMalikahRepository
    {
        private MalikahContext _ctx;

        public MalikahRepository(MalikahContext malikahContext)
        {
            _ctx = malikahContext;
        }

        public IEnumerable<Item> GetAllItems()
        {
            return _ctx.Item.ToList();
        }

        public IEnumerable<Season> GetAllSeasons()
        {
            return _ctx.Season.ToList();
        }

        public void AddEntity(object model)
        {
            _ctx.Add(model);
        }

        public bool SaveAll()
        {
            return _ctx.SaveChanges() > 0;
        }

        public IEnumerable<Collection> GetAllCollections()
        {

            return _ctx.Collection.Include(c => c.Categorycollection).ToList();

        }
    }
}
