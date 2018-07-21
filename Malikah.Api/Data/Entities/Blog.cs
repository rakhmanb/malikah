using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Blog
    {
        public Blog()
        {
            Comment = new HashSet<Comment>();
        }

        public int Id { get; set; }
        public string Title { get; set; }
        public string Post { get; set; }
        public int UserId { get; set; }

        public User User { get; set; }
        public ICollection<Comment> Comment { get; set; }
    }
}
