using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Malikah.Api.Models
{
    public class ItemViewModel
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Description { get; set; }
        public int Price { get; set; }
        public string Sku { get; set; }
        public int CollectionId { get; set; }
        public int? CategoryId { get; set; }
        public int AvailableInventory { get; set; }
        public int CoverPhotoIndex { get; set; }
    }
}
