using System.ComponentModel.DataAnnotations;

namespace RegistraOC.Models
{
    public class Req
    {
        //Class Purchase requirement
        [Key]
        public string cia_codcia { get; set; }
        [Key]
        public string suc_codsuc { get; set; }
        [Key]
        public string rco_numrco { get; set; }

        [Required(ErrorMessage = "Campo obligatorio")]
        [MaxLength(2, ErrorMessage = "El campo no debe de tener mas de 2 caracteres")]
        public string tin_codtin{ get; set; } 
        public DateTime rco_fecreg{ get; set; }  
        public DateTime rco_fecsug { get; set; }

        [Required(ErrorMessage = "Campo obligatorio")]
        [MaxLength(2, ErrorMessage = "El campo no debe de tener mas de 2 caracteres")]
        public string adi_codadi{ get; set; }

        [MaxLength(10, ErrorMessage = "El campo no debe de tener mas de 10 caracteres")]
        public string s10_usuario{ get; set; }  
        public string rco_motivo{ get; set; }  
        public string rco_glorco{ get; set; } 
        public string cco_codcco{ get; set; }  
        public string rco_sitrco{ get; set; } 
        public string rco_sitlog{ get; set; } 
        public string ano_codano{ get; set; } 
        public string mes_codmes{ get; set; } 
        public string usu_codapr{ get; set; }  
        public string rco_fecapr{ get; set; }  
        public string rco_gloapr{ get; set; }  
        public string rco_indest{ get; set; }  
        public string rco_feccre{ get; set; }  
        public string rco_usucre{ get; set; }  
        public string rco_fecact{ get; set; }  
        public string rco_codusu{ get; set; }  
        public string ung_codung{ get; set; }  
        public string rco_indcie{ get; set; }  
        public string rco_obscie{ get; set; }  
        public string rco_indval{ get; set; }  
        public string rco_numpcn{ get; set; }  
        public string dis_coddis{ get; set; }  
        public string rco_rembls{ get; set; }  
        public string rco_presup{ get; set; }  
        public string rco_9digit{ get; set; }  
        public string rco_priori{ get; set; }  
        public string rco_codalt{ get; set; }  
        public string rco_obspri{ get; set; }  
        public string rco_rutdoc{ get; set; }  
        public string rco_fecprg{ get; set; }  
        public string rco_procur{ get; set; }  
        public string rco_tiprco{ get; set; }  
        public string ocm_corocm{ get; set; }  
        public string tmo_codtmo{ get; set; }  
        public string rco_fecent{ get; set; }  
        public string rco_impser{ get; set; }  
        public string rco_flgcom{ get; set; }  
        public string rco_flgate{ get; set; }  
        public string rco_jusate{ get; set; }  
        public string rco_flgmig{ get; set; }  
        public string rco_imppor{ get; set; }  
        public string rco_hito01{ get; set; }  
        public string cpa_codcpa{ get; set; } 
        public string rco_imprec{ get; set; }  
        public string rco_impfac{ get; set; }  
        public string rco_numsol{ get; set; }  
        public string rco_monpre{ get; set; }  
        public string rco_imppre{ get; set; }  
        public string rco_sitctb{ get; set; }  
        public string rco_ajufac{ get; set; }  
        public string rco_impcfm{ get; set; }  
        public string rco_feinre{ get; set; }  
        public string rco_fefire{ get; set; }  
        public string rco_clfprv{ get; set; }  
        public string rco_gloclf{ get; set; }  
        public string rco_ultcer{ get; set; }  
        public string rco_feaclf{ get; set; }  
        public string rco_usaclf { get; set; }


    }
}
