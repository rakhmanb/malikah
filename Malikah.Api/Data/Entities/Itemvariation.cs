using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Itemvariation
    {
        public int Id { get; set; }
        public int? ItemId { get; set; }
        public string Size { get; set; }
        public string Color { get; set; }
        public string Description { get; set; }

        public Item Item { get; set; }
    }
}
