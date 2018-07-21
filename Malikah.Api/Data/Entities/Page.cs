using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Page
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Content { get; set; }
        public int PageCategoryId { get; set; }
        public string DisplayName { get; set; }

        public Pagecategory PageCategory { get; set; }
    }
}
