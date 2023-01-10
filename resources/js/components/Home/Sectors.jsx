import React, {useEffect} from "react"
import {Card, CardContent, CardHeader} from "@mui/material";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../services/icons/icons";
import {useAppDispatch, useAppSelector} from "../../redux/hooks/hooks";
import {getAllSectors} from "../../redux/actions/sectorActions";
import Carousel, {CarouselItem} from "../UI/Carousel/Carousel";

const  Sectors = () => {
    const dispatch = useAppDispatch()
    const sectors = useAppSelector(state => state.sectors.sectors)

    useEffect(() => {
        dispatch(getAllSectors())
    },[])
    return (
            <Card elevation={2}
            style={{
                paddingTop: 8,
                paddingLeft:0,
                paddingRight:0,
                paddingBottom:8,
                margin:8
        }}
            >
                <CardHeader
                    className="title-bar"
                    action={
                        <div>
                            <FontAwesomeIcon icon={getBrandIcon('faIndustry')} />
                        </div>
                    }
                    title={'Sectors'}
                />
                <CardContent>
                    <Carousel>
                        {sectors &&
                            sectors.map((sector, index) => (
                                <CarouselItem key={sector.name}>
                                    <div>
                                        <FontAwesomeIcon
                                            title={sector.name}
                                            className={'tech-icon'}
                                            icon={getBrandIcon(sector.icon)}
                                            size="4x" fixedWidth
                                            color={'secondary'}
                                        />
                                        <div className="legend">{sector.name}</div>
                                    </div>
                                </CarouselItem>
                            ))}
                    </Carousel>
                </CardContent>
            </Card>
    )
}

export default Sectors
