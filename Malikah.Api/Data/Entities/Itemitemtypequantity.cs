using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Itemitemtypequantity
    {
        public int Id { get; set; }
        public int? ItemId { get; set; }
        public int? ItemTypeId { get; set; }
        public int? Quantity { get; set; }
        public int? AvailableQuantity { get; set; }
    }
}
