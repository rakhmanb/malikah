using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Item
    {
        public Item()
        {
            Itemvariation = new HashSet<Itemvariation>();
            Picture = new HashSet<Picture>();
            Review = new HashSet<Review>();
        }

        public int Id { get; set; }
        public string Name { get; set; }
        public string Description { get; set; }
        public int Price { get; set; }
        public string Sku { get; set; }
        public int CollectionId { get; set; }
        public int? CategoryId { get; set; }
        public int AvailableInventory { get; set; }
        public int CoverPhotoId { get; set; }

        public Collection Collection { get; set; }
        public ICollection<Itemvariation> Itemvariation { get; set; }
        public ICollection<Picture> Picture { get; set; }
        public ICollection<Review> Review { get; set; }
    }
}
