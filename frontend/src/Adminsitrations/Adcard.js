import * as React from 'react';
import Card from '@mui/material/Card';
import CardActions from '@mui/material/CardActions';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import a from '/home/speedweed/Desktop/cypher/frontend/frontend/src/Adminsitrations/poste.png'
import { padding } from '@mui/system';
import { Link } from 'react-router-dom'
export default function Adcard({props}) {
  return (
    <Card sx={{ maxWidth: 360 ,}}>
      <CardMedia
        component="img"
        height="100"
        image={a}
        alt="la poste"
      />
      <CardContent>
        <Typography gutterBottom variant="h5" component="div">
            {props.location}
        </Typography>
        <Typography variant="body2" color="text.secondary">
          {props.Services}
        </Typography>
      </CardContent>
      <CardActions>
        <Link to='/ghazela'><Button size="small">more info</Button></Link>
        <Button size="small">go Back</Button>
      </CardActions>
    </Card>
  );
}