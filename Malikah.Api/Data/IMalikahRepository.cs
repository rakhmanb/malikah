using Malikah.Api.Data.Entities;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Malikah.Api.Data
{
    public interface IMalikahRepository
    {
        //Items
        IEnumerable<Item> GetAllItems();

        //Seasons
        IEnumerable<Season> GetAllSeasons();

        //Collections
        IEnumerable<Collection> GetAllCollections();

        bool SaveAll();
        void AddEntity(object model);
    }
}
