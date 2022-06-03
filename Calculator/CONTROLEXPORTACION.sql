Select 
      a.cia_codcia			   ,      a.IdImportacion		   ,      a.Año					   ,      a.TipoCodigo			   ,
      a.Correlativo			   ,      a.Parcial01			   ,      a.Parcial02			   ,      a.CodigoImportacion	   ,
      a.IdSeguimiento		   ,      a.IdProductoCEX		   ,      a.IdClasificacionCEX	   ,      a.IdFamiliaCEX		   ,
      a.prd_codepk			   ,      a.prd_codprd			   ,      a.CodigoSG			   ,      a.IdProveedorCEX		   ,
      a.Contrato			   ,      a.FechaContrato		   ,      a.IdPlazoPago			   ,      a.IdDiasPlazo			   ,
      a.Factura				   ,      a.FechaFactura		   ,      a.FechaVenFactura		   ,      a.IdEstadoPago		   ,
      a.IdIncoterm			   ,      a.IdFletamiento		   ,      a.CantidadTM			   ,      a.PrecioUSDTM			   ,
      a.FleteUSDTM			   ,      a.FOBUSD				   ,      a.SeguroUSD			   ,      a.TotalUSD			   ,
      a.CantidadCNT			   ,      a.IdTipoCarga			   ,      a.IdTipoCarga02		   ,      a.IdPresentacion		   ,
      a.PesoBBTM			   ,      a.IdMarca				   ,      a.MesEmbProg			   ,      a.FechaEmbProgIni		   ,
      a.FechaEmbProgFin		   ,      a.FechaBL				   ,      a.FechaETDIni			   ,      a.FechaETD			   ,
      a.IdConfirmaETD		   ,      a.FechaETAIni			   ,      a.FechaETA			   ,      a.IdConfirmaETA		   ,
      a.FechaIngAlmIni		   ,      a.FechaIngAlm			   ,      a.IdConfirmaAlm		   ,      a.pai_codpai			   ,
      a.IdPuertoOrigen		   ,      a.IdPuertoDestino		   ,      a.IdTerminalMar		   ,      a.IdAlmacenDestino	   ,
      a.BL					   ,      a.BLFecha				   ,      a.IdEmisionBL			   ,      a.Almacen				   ,
      a.NaveOrigen			   ,      a.NaveDestino			   ,      a.IdNaviera			   ,      a.IdAgenteMaritimo	   ,
      a.IdDireccionamiento	   ,      a.Manifiesto			   ,      a.FecIniDescarga		   ,      a.FecFinDescarga		   ,
      a.FechaVB				   ,      a.FechaDLVenc			   ,      a.DLVenc				   ,      a.FechaADVenc			   ,
      a.NroDAM				   ,      a.FechaDAM			   ,      a.IdTipoDespacho		   ,      a.IdCanalCEX			   ,
      a.FechaDAMLevante		   ,      a.OKDocEntregados		   ,      a.NroLicencia			   ,      a.NroExpediente		   ,
      a.NroSuce				   ,      a.IdEstatusSucamec	   ,      a.FechaInsSucamec		   ,      a.FechaResSucamec		   ,
      a.Observa				   ,      a.MotivosDemora		   ,      a.Observa2			   ,      a.IdRegimen			   ,
      a.AlmacenAduana		   ,      a.OKCertificadoInsp	   ,      a.FechaRecCertificadoInsp,      a.OKIncidenciaInsp	   ,
      a.OKObservaInsp		   ,      a.ObservaInsp			   ,      a.OKDocRecibidos		   ,      a.Estado				   ,
      a.aud_usuact			   ,      a.aud_fecact			   ,      a.aud_usucre			   ,      a.aud_feccre			   ,
      a.Ajuste				   ,      a.Distrib				   ,      a.FechaAforo			   ,      a.SolPed				   ,
      a.OCompraSG			   ,      a.OCFechaApr			   ,      a.OCFechaIng			   ,      a.OCFechaPro			   ,
      a.OCEstatus			   ,      a.Criticidad			   ,      a.Pareto				   ,      a.CodAnt				   ,
      a.CantBultos			   ,      a.NroUniTrans		       ,
		ISNULL(convert(char(10),a.FechaContrato,103),'')as FechaContratoC,
		ISNULL(a.IdClasificacionCEX,'') +  ' - ' +ISNULL(a.IdFamiliaCEX,'')                                   ,
		ISNULL(convert(char(10),a.FechaVenFactura,103),'')as FechaVenFacturaC,
		ISNULL(convert(char(10),a.FechaBL,103),'')as FechaBLC,
		ISNULL(convert(char(10),a.FechaETDIni,103),'')as FechaETDIniC,
		ISNULL(convert(char(10),a.FechaETD,103),'')as FechaETDC,
		ISNULL(convert(char(10),a.FechaETAIni,103),'')as FechaETAIniC,
		ISNULL(convert(char(10),a.FechaETA,103),'')as FechaETAC,
		ISNULL(convert(char(10),a.FechaDLVenc,103),'') as DiaslibresVto,
		ISNULL(a.OKDocEntregados,'') as OKDocEntregados,
		ISNULL(prd.prd_codprd,'')  as prd_codprd, 
		ISNULL(etd.CantFechaETD,0) as CantFechaETD,
		ISNULL(eta.CantFechaETA,0) as CantFechaETA,
		Year(A.FechaETD)    as AñoE, 
		Year(A.FechaIngAlm) as AñoA, 
		B.ProductoCEX,B.IDClasificacionMitsui,
		C.ProveedorCEX,
		D.Seguimiento,D.Estatus02,
		ISNULL(E.TipoCarga,'') as TipoCarga,
		ISNULL(f.PuertoOrigen,'') as PuertoOrigen,
		ISNULL(g.PuertoDestino,'') as PuertoDestino,
		Isnull(H.Direccionamiento,'') as Direccionamiento,
		Isnull(i.CanalCEX,'') as CanalCEX,
		ISNULL(j.Incoterm,'') as Incoterm,
		ISNULL(k.EmisionBL,'') as EmisionBL,
		ISNULL(l.Naviera,'') as Naviera,
		ISNULL(m.Regimen,'') as Regimen,
		ISNULL(n.PresentacionCEX,'') as PresentacionCEX,
		ISNULL(o.PlazoPago,'') as PlazoPago,
		ISNULL(p.DiasPlazo,'') as DiasPlazo,
		ISNULL(q.Estado,'') as Estado,
		ISNULL(r.TipoCarga02,'') as TipoCarga02,
		Isnull(s.ClasificacionMitsui,'') as ClasificacionMitsui,
		Isnull(t.Marca,'') as Marca,
		Isnull(u.Fletamiento,'') as Fletamiento,
		Isnull(v.PAI_NOMCOR,'') as Pais,
		Isnull(w.TerminalMar,'') as TerminalMar,
		Isnull(x.AlmacenDestino,'') as AlmacenDestino,
		(Case when Isnull(a.Criticidad,0)=1 Then 'URGENTE'
		     when Isnull(a.Criticidad,0)=2 Then 'MEDIA'
			 when Isnull(a.Criticidad,0)=3 Then 'BAJA'
			 Else '' End) as CriticidadD
	From CEX_Importacion A
	Left Join Cex_ProductoCEX B on A.IdProductoCEX=B.IdProductoCEX
	Left Join Cex_ProveedorCEX C on A.IdProveedorCEX=C.IdProveedorCEX
	Left Join Cex_Seguimiento D on a.IdSeguimiento=d.IdSeguimiento
	Left Join Cex_TipoCarga E on a.IdTipoCarga=e.IdTipoCarga
	Left Join Cex_PuertoOrigen F on a.IdPuertoOrigen=f.IdPuertoOrigen
	Left Join Cex_PuertoDestino G on a.IdPuertoDestino=G.IdPuertoDestino
	Left Join CEX_Direccionamiento H on a.IdDireccionamiento = h.IdDireccionamiento
	left join CEX_CanalCEX I on a.IdCanalCEX=i.IdCanalCex
	left join CEX_Incoterm J on a.IdIncoterm=j.IdIncoterm
	left join CEX_EmisionBL K on a.IdEmisionBL=k.IdEmisionBL
	left join CEX_Naviera L on a.IdNaviera=l.IdNaviera
	left join CEX_Regimen M on a.IdRegimen=m.IdRegimen
	left join CEX_PresentacionCEX N on a.IdPresentacion=N.IdPresentacionCEX
	left join CEX_PlazoPago O on a.IdPlazoPago=o.IdPlazoPago
	left join CEX_DiasPlazo P on a.IdDiasPlazo=p.IdDiasPlazo
	left join CEX_EstadoPago Q on a.IdEstadoPago=q.IdEstadoPago
	Left Join CEX_TipoCarga02 R on a.IdTipoCarga02=r.IdTipoCarga02
	left join PRODUCTOS_PRD prd on a.prd_codepk=prd.prd_codepk
    Left Join CEX_ClasificacionMitsui S on b.IDClasificacionMitsui=s.IdClasificacionMitsui
	Left Join CEX_Marca T on a.IdMarca=t.IdMarca
	Left Join CEX_TerminoFletamiento U on a.IdFletamiento=U.IdFletamiento
	Left Join pais_pai V on a.pai_codpai=v.PAI_CODPAI
	Left Join CEX_TerminalMar W on a.IdTerminalMar=w.IdTerminalMar
	Left Join CEX_AlmacenDestino X on a.IdAlmacenDestino=x.IdAlmacenDestino
	left join( select cia_codcia,IdImportacion,
				COUNT(IdImportacion) as CantFechaETD
		  from CEX_ImportacionETD 
		  group by cia_codcia,IdImportacion
	)as etd on a.cia_codcia=etd.cia_codcia and a.IdImportacion=etd.IdImportacion
	left join (select cia_codcia,IdImportacion,
				COUNT(IdImportacion) as CantFechaETA
		  from CEX_ImportacionETA 
		  group by cia_codcia,IdImportacion
	)as eta on a.cia_codcia=eta.cia_codcia and a.IdImportacion=eta.IdImportacion

