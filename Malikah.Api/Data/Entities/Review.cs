using System;
using System.Collections.Generic;

namespace Malikah.Api.Data.Entities
{
    public partial class Review
    {
        public int Id { get; set; }
        public int UserId { get; set; }
        public string Review1 { get; set; }
        public int Rating { get; set; }
        public int Helpful { get; set; }
        public int Unhelpful { get; set; }
        public int ItemId { get; set; }

        public Item Item { get; set; }
        public User User { get; set; }
    }
}
