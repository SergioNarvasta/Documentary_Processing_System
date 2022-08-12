FUNCTION SIN_TILDES
LPARAMETERS tcTextoOriginal
LOCAL lcTextoNuevo
  
  #DEFINE _CAR_ORIGINALES_ "ΑΙΝΣΪάαινσϊό"
  #DEFINE _CAR_RETORNADOS_ "AEIOUUaeiouu"
  
  lcTextoNuevo = CHRTRAN(tcTextoOriginal, _CAR_ORIGINALES_, _CAR_RETORNADOS_)
  
RETURN (lcTextoNuevo)
*
*
