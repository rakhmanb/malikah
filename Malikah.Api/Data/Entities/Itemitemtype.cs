using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Itemitemtype
    {
        public int Id { get; set; }
        public int? ItemId { get; set; }
        public int? ItemTypeId { get; set; }
    }
}
