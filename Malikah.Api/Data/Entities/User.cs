using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class User
    {
        public User()
        {
            Blog = new HashSet<Blog>();
            Comment = new HashSet<Comment>();
            Review = new HashSet<Review>();
        }

        public int Id { get; set; }
        public string Username { get; set; }
        public string Email { get; set; }
        public string Password { get; set; }
        public string Address { get; set; }
        public string ExtraInfo { get; set; }
        public sbyte Administrator { get; set; }
        public string Firstname { get; set; }
        public string Lastname { get; set; }

        public ICollection<Blog> Blog { get; set; }
        public ICollection<Comment> Comment { get; set; }
        public ICollection<Review> Review { get; set; }
    }
}
