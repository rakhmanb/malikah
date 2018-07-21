using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Categorycollection
    {
        public int Id { get; set; }
        public int CategoryId { get; set; }
        public int CollectionId { get; set; }

        public Category Category { get; set; }
        public Collection Collection { get; set; }
    }
}
