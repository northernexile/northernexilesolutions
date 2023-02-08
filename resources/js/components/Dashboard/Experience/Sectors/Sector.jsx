
import React, {useEffect, useState} from "react"
import {Chip} from "@mui/material";

import {toggleExperienceSector} from "../../../../redux/actions/experienceSectorActions";
import {useAppDispatch} from "../../../../redux/hooks/hooks";

const Sector = (params) => {
    const dispatch = useAppDispatch()
    const name = params.name
    let selected = params.selected

    const [itemSelected,setItemSelected] = useState(false)

    useEffect(()=>{setItemSelected(selected)},[])

    const toggleItemSelected = () => {
        let toggled = !itemSelected
        setItemSelected(toggled)
        dispatch(toggleExperienceSector(params.experienceId,params.sectorId))
    }

    const getColor = () => {
        return itemSelected ? "primary" : "secondary"
    }

    return (
        <Chip
            style={{marginRight: 2,marginBottom:2}}
            label={name}
            key={`sector-chip-${name}`}
            onClick={()=>{toggleItemSelected()}}
            color={getColor()}
        />
    )
}

export default Sector
