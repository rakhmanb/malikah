using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Category
    {
        public Category()
        {
            Categorycollection = new HashSet<Categorycollection>();
        }

        public int Id { get; set; }
        public string Name { get; set; }
        public int ShopId { get; set; }

        public Shop Shop { get; set; }
        public ICollection<Categorycollection> Categorycollection { get; set; }
    }
}
