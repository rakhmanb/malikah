using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Shop
    {
        public Shop()
        {
            Category = new HashSet<Category>();
            Collection = new HashSet<Collection>();
        }

        public int Id { get; set; }
        public string Name { get; set; }

        public ICollection<Category> Category { get; set; }
        public ICollection<Collection> Collection { get; set; }
    }
}
