using Microsoft.AspNetCore.Identity.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore;

namespace RegistraOC.Data
{
    public class ApplicationDbContext : IdentityDbContext
    {
        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options)
            : base(options)
        {

        }
        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseSqlServer("Server=HDVMSQLDES; Database=LAVALIN; User=sa; Password=S0p0rt3; MultipleActiveResultSets=true;");
        }
        public DbSet<RegistraOC.Models.RQOrdenCompra> RQOrdenCompras { get; set; }
    }
}