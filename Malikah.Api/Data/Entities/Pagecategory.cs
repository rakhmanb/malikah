using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Pagecategory
    {
        public Pagecategory()
        {
            Page = new HashSet<Page>();
        }

        public int Id { get; set; }
        public string Name { get; set; }
        public string DisplayName { get; set; }

        public ICollection<Page> Page { get; set; }
    }
}
