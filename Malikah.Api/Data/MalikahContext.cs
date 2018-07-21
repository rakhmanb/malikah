using System;
using Malikah.Api.Data.Entities;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;

namespace Malikah.Api.Data
{
    public partial class MalikahContext : DbContext
    {
        public virtual DbSet<Blog> Blog { get; set; }
        public virtual DbSet<Category> Category { get; set; }
        public virtual DbSet<Categorycollection> Categorycollection { get; set; }
        public virtual DbSet<Collection> Collection { get; set; }
        public virtual DbSet<Comment> Comment { get; set; }
        public virtual DbSet<Item> Item { get; set; }
        public virtual DbSet<Itemitemtype> Itemitemtype { get; set; }
        public virtual DbSet<Itemitemtypequantity> Itemitemtypequantity { get; set; }
        public virtual DbSet<Itemtype> Itemtype { get; set; }
        public virtual DbSet<Itemvariation> Itemvariation { get; set; }
        public virtual DbSet<Page> Page { get; set; }
        public virtual DbSet<Pagecategory> Pagecategory { get; set; }
        public virtual DbSet<Picture> Picture { get; set; }
        public virtual DbSet<Review> Review { get; set; }
        public virtual DbSet<Season> Season { get; set; }
        public virtual DbSet<Shop> Shop { get; set; }
        public virtual DbSet<User> User { get; set; }

        public MalikahContext(DbContextOptions<MalikahContext> options) 
            : base(options)
        {

        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Blog>(entity =>
            {
                entity.ToTable("blog");

                entity.HasIndex(e => e.UserId)
                    .HasName("UserId");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.Post).IsRequired();

                entity.Property(e => e.Title)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.UserId).HasColumnType("int(11)");

                entity.HasOne(d => d.User)
                    .WithMany(p => p.Blog)
                    .HasForeignKey(d => d.UserId)
                    .HasConstraintName("FK_User_Blog");
            });

            modelBuilder.Entity<Category>(entity =>
            {
                entity.ToTable("category");

                entity.HasIndex(e => e.ShopId)
                    .HasName("ShopId");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.Name)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.ShopId).HasColumnType("int(11)");

                entity.HasOne(d => d.Shop)
                    .WithMany(p => p.Category)
                    .HasForeignKey(d => d.ShopId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK_Category_Shop");
            });

            modelBuilder.Entity<Categorycollection>(entity =>
            {
                entity.ToTable("categorycollection");

                entity.HasIndex(e => e.CategoryId)
                    .HasName("CategoryId");

                entity.HasIndex(e => e.CollectionId)
                    .HasName("CollectionId");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.CategoryId).HasColumnType("int(11)");

                entity.Property(e => e.CollectionId).HasColumnType("int(11)");

                entity.HasOne(d => d.Category)
                    .WithMany(p => p.Categorycollection)
                    .HasForeignKey(d => d.CategoryId)
                    .HasConstraintName("FK_Category_Collection");

                entity.HasOne(d => d.Collection)
                    .WithMany(p => p.Categorycollection)
                    .HasForeignKey(d => d.CollectionId)
                    .HasConstraintName("FK_Collection_Category");
            });

            modelBuilder.Entity<Collection>(entity =>
            {
                entity.ToTable("collection");

                entity.HasIndex(e => e.ShopId)
                    .HasName("ShopId");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.Description).IsRequired();

                entity.Property(e => e.DisplayName)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.Image)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.Indefinite).HasColumnType("tinyint(1)");

                entity.Property(e => e.Name)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.SeasonId).HasColumnType("int(11)");

                entity.Property(e => e.ShopId).HasColumnType("int(11)");

                entity.Property(e => e.Year)
                    .IsRequired()
                    .HasColumnType("text");

                entity.HasOne(d => d.Shop)
                    .WithMany(p => p.Collection)
                    .HasForeignKey(d => d.ShopId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK_Collection_Shop");
            });

            modelBuilder.Entity<Comment>(entity =>
            {
                entity.ToTable("comment");

                entity.HasIndex(e => e.BlogId)
                    .HasName("BlogId");

                entity.HasIndex(e => e.UserId)
                    .HasName("UserId");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.BlogId).HasColumnType("int(11)");

                entity.Property(e => e.Comment1)
                    .IsRequired()
                    .HasColumnName("Comment");

                entity.Property(e => e.UserId).HasColumnType("int(11)");

                entity.HasOne(d => d.Blog)
                    .WithMany(p => p.Comment)
                    .HasForeignKey(d => d.BlogId)
                    .HasConstraintName("FK_Blog_Comment");

                entity.HasOne(d => d.User)
                    .WithMany(p => p.Comment)
                    .HasForeignKey(d => d.UserId)
                    .HasConstraintName("FK_User_Comment");
            });

            modelBuilder.Entity<Item>(entity =>
            {
                entity.ToTable("item");

                entity.HasIndex(e => e.CategoryId)
                    .HasName("CategoryId");

                entity.HasIndex(e => e.CollectionId)
                    .HasName("CollectionId");

                entity.HasIndex(e => e.CoverPhotoId)
                    .HasName("CoverPhotoId");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.AvailableInventory).HasColumnType("int(11)");

                entity.Property(e => e.CategoryId).HasColumnType("int(11)");

                entity.Property(e => e.CollectionId).HasColumnType("int(11)");

                entity.Property(e => e.CoverPhotoId).HasColumnType("int(11)");

                entity.Property(e => e.Description).IsRequired();

                entity.Property(e => e.Name)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.Price).HasColumnType("int(11)");

                entity.Property(e => e.Sku)
                    .IsRequired()
                    .HasColumnType("text");

                entity.HasOne(d => d.Collection)
                    .WithMany(p => p.Item)
                    .HasForeignKey(d => d.CollectionId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK_Collection_Item");
            });

            modelBuilder.Entity<Itemitemtype>(entity =>
            {
                entity.ToTable("itemitemtype");

                entity.Property(e => e.Id)
                    .HasColumnName("ID")
                    .HasColumnType("int(11)");

                entity.Property(e => e.ItemId)
                    .HasColumnName("ItemID")
                    .HasColumnType("int(11)");

                entity.Property(e => e.ItemTypeId)
                    .HasColumnName("ItemTypeID")
                    .HasColumnType("int(11)");
            });

            modelBuilder.Entity<Itemitemtypequantity>(entity =>
            {
                entity.ToTable("itemitemtypequantity");

                entity.Property(e => e.Id)
                    .HasColumnName("ID")
                    .HasColumnType("int(11)");

                entity.Property(e => e.AvailableQuantity).HasColumnType("int(11)");

                entity.Property(e => e.ItemId)
                    .HasColumnName("ItemID")
                    .HasColumnType("int(11)");

                entity.Property(e => e.ItemTypeId)
                    .HasColumnName("ItemTypeID")
                    .HasColumnType("int(11)");

                entity.Property(e => e.Quantity).HasColumnType("int(11)");
            });

            modelBuilder.Entity<Itemtype>(entity =>
            {
                entity.ToTable("itemtype");

                entity.Property(e => e.Id)
                    .HasColumnName("ID")
                    .HasColumnType("int(11)");

                entity.Property(e => e.ItemTypeGroup).HasMaxLength(45);

                entity.Property(e => e.Type).HasMaxLength(100);
            });

            modelBuilder.Entity<Itemvariation>(entity =>
            {
                entity.ToTable("itemvariation");

                entity.HasIndex(e => e.Id)
                    .HasName("Id_UNIQUE")
                    .IsUnique();

                entity.HasIndex(e => e.ItemId)
                    .HasName("ItemVariation_Item_idx");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.Color).HasMaxLength(45);

                entity.Property(e => e.Description).HasMaxLength(500);

                entity.Property(e => e.ItemId).HasColumnType("int(11)");

                entity.Property(e => e.Size).HasMaxLength(45);

                entity.HasOne(d => d.Item)
                    .WithMany(p => p.Itemvariation)
                    .HasForeignKey(d => d.ItemId)
                    .OnDelete(DeleteBehavior.Cascade)
                    .HasConstraintName("ItemVariation_Item");
            });

            modelBuilder.Entity<Page>(entity =>
            {
                entity.ToTable("page");

                entity.HasIndex(e => e.PageCategoryId)
                    .HasName("PageCategoryId");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.Content).IsRequired();

                entity.Property(e => e.DisplayName)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.Name)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.PageCategoryId).HasColumnType("int(11)");

                entity.HasOne(d => d.PageCategory)
                    .WithMany(p => p.Page)
                    .HasForeignKey(d => d.PageCategoryId)
                    .HasConstraintName("FK_PageCategory_Page");
            });

            modelBuilder.Entity<Pagecategory>(entity =>
            {
                entity.ToTable("pagecategory");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.DisplayName)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.Name)
                    .IsRequired()
                    .HasColumnType("text");
            });

            modelBuilder.Entity<Picture>(entity =>
            {
                entity.ToTable("picture");

                entity.HasIndex(e => e.ItemId)
                    .HasName("ItemId");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.Data)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.Date).HasColumnType("int(11)");

                entity.Property(e => e.ItemId).HasColumnType("int(11)");

                entity.HasOne(d => d.Item)
                    .WithMany(p => p.Picture)
                    .HasForeignKey(d => d.ItemId)
                    .HasConstraintName("FK_Item_Picture");
            });

            modelBuilder.Entity<Review>(entity =>
            {
                entity.ToTable("review");

                entity.HasIndex(e => e.ItemId)
                    .HasName("ItemId_2");

                entity.HasIndex(e => e.UserId)
                    .HasName("UserId_2");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.Helpful).HasColumnType("int(11)");

                entity.Property(e => e.ItemId).HasColumnType("int(11)");

                entity.Property(e => e.Rating).HasColumnType("int(11)");

                entity.Property(e => e.Review1)
                    .IsRequired()
                    .HasColumnName("Review");

                entity.Property(e => e.Unhelpful).HasColumnType("int(11)");

                entity.Property(e => e.UserId).HasColumnType("int(11)");

                entity.HasOne(d => d.Item)
                    .WithMany(p => p.Review)
                    .HasForeignKey(d => d.ItemId)
                    .HasConstraintName("FK_Item_Review");

                entity.HasOne(d => d.User)
                    .WithMany(p => p.Review)
                    .HasForeignKey(d => d.UserId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK_User_Review");
            });

            modelBuilder.Entity<Season>(entity =>
            {
                entity.ToTable("season");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.Name)
                    .IsRequired()
                    .HasColumnType("text");
            });

            modelBuilder.Entity<Shop>(entity =>
            {
                entity.ToTable("shop");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.Name)
                    .IsRequired()
                    .HasColumnType("text");
            });

            modelBuilder.Entity<User>(entity =>
            {
                entity.ToTable("user");

                entity.Property(e => e.Id).HasColumnType("int(11)");

                entity.Property(e => e.Address)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.Administrator).HasColumnType("tinyint(1)");

                entity.Property(e => e.Email)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.ExtraInfo)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.Firstname)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.Lastname)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.Password)
                    .IsRequired()
                    .HasColumnType("text");

                entity.Property(e => e.Username)
                    .IsRequired()
                    .HasColumnType("text");
            });
        }
    }
}
