
import React, {useEffect} from "react";
import {useAppDispatch, useAppSelector} from "../../redux/hooks/hooks"
import {getAllTagCloud} from "../../redux/actions/tagCloudActions";
import {TagCloud} from "react-tagcloud"
import {Card, CardContent, CardHeader} from "@mui/material";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import getBrandIcon from "../../services/icons/icons";

const WordCloud = () => {
    const dispatch = useAppDispatch()
    const cloud = useAppSelector(state => state.cloud.cloud)
    useEffect(() => {
        getTags()
    }, []);

    const getTags = () => {
        dispatch(getAllTagCloud())
    }

    const customRenderer = (tag,size) => {
        const array = ['primary','secondary']
        const randomElement = array[Math.floor(Math.random() * array.length)];
        return (
            <span key={tag.value} className={`tag-item tag-${randomElement} tag-${size}`}>
      {tag.value}
    </span>
        )
    }

    return (
        <Card elevation={2}
              style={{
                  paddingTop: 0,
                  paddingLeft:0,
                  paddingRight:0,
                  paddingBottom:8,
                  margin:8,
                  marginBottom:32
              }}
        >
            <CardHeader
                className="title-bar"
                title={'Technologies & Industries'}
                action={
                    <div>
                        <FontAwesomeIcon icon={getBrandIcon('faDesktop')} />
                    </div>
                }
            />
            <CardContent>
                <TagCloud
                    disableRandomColor={true}
                    tags={cloud}
                    minSize={12}
                    maxSize={35}
                    renderer={customRenderer}
                ></TagCloud>
            </CardContent>
        </Card>
    )
}

export default WordCloud
