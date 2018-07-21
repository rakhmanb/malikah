using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Collection
    {
        public Collection()
        {
            Categorycollection = new HashSet<Categorycollection>();
            Item = new HashSet<Item>();
        }

        public int Id { get; set; }
        public string Name { get; set; }
        public string DisplayName { get; set; }
        public int ShopId { get; set; }
        public string Year { get; set; }
        public int SeasonId { get; set; }
        public bool Indefinite { get; set; }
        public string Description { get; set; }
        public string Image { get; set; }

        public Shop Shop { get; set; }
        public ICollection<Categorycollection> Categorycollection { get; set; }
        public ICollection<Item> Item { get; set; }
    }
}
