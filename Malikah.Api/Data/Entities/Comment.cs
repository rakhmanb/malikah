using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Comment
    {
        public int Id { get; set; }
        public string Comment1 { get; set; }
        public int UserId { get; set; }
        public int BlogId { get; set; }

        public Blog Blog { get; set; }
        public User User { get; set; }
    }
}
