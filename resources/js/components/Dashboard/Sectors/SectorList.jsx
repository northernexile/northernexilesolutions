
import React, {useEffect} from "react";
import {useAppDispatch, useAppSelector} from "../../../redux/hooks/hooks";
import {deleteSector, getAllSectors,} from "../../../redux/actions/sectorActions";
import {Link} from "react-router-dom";
import {Chip} from "@mui/material";
import {useSelector} from "react-redux";
import {getAllContacts} from "../../../redux/actions/contactActions";

const SectorList = () => {
    const dispatch = useAppDispatch();
    const sectors = useAppSelector(state => state.sectors.sectors)

    useEffect(()=>{
        handleLoad()
    },[]);

    const handleLoad = () => {
        dispatch(getAllSectors())
        console.log(sectors)
    }

    const handleDelete = (sector) => {
        dispatch(deleteSector(sector))
            .then(()=>dispatch(getAllSectors()))
    }

    const sectorList = () => {
        return (<div>
            {sectors.map((sector,index) => (
                <Chip
                    style={{marginRight:2}}
                    label={sector.name}
                    onDelete={() => {handleDelete(sector)}}
                    key={`sector-chip-${sector.id}`}
                />
                ))}
            </div>
        )
    }

    return (
        <div className={`tag-list`}>
            {sectors && sectorList()}
        </div>
    )
}

export default SectorList
