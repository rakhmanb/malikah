using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Picture
    {
        public int Id { get; set; }
        public int ItemId { get; set; }
        public string Data { get; set; }
        public int Date { get; set; }

        public Item Item { get; set; }
    }
}
