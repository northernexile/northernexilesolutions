
import React, {useEffect} from "react"
import {useAppDispatch,useAppSelector} from "../../redux/hooks/hooks";
import {getChart} from "../../redux/actions/chartActions";

const Graphs = () => {

    const dispatch = useAppDispatch();
    const frameworks = useAppSelector(state => state.chart.chart);

    useEffect(() => dispatch(getChart()),[])

    console.log(frameworks)

    return (
        <>Graphs</>
    )
}

export default Graphs;
