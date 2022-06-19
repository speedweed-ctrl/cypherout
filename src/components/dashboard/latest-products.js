import { formatDistanceToNow, subHours } from 'date-fns';
import { v4 as uuid } from 'uuid';
import {
  Box,
  Button,
  Card,
  CardHeader,
  Divider,
  IconButton,
  List,
  ListItem,
  ListItemAvatar,
  ListItemText
} from '@mui/material';
import ArrowRightIcon from '@mui/icons-material/ArrowRight';
import MoreVertIcon from '@mui/icons-material/MoreVert';

const products = [
  {
    id: uuid(),
    name: 'walid jaounai',
    imageUrl: '/static/images/products/a.png',
    updatedAt: subHours(Date.now(), 2)
  },
  {
    id: uuid(),
    name: 'amir ben ammer',
    imageUrl: '/static/images/products/a.png',
    updatedAt: subHours(Date.now(), 2)
  },
  {
    id: uuid(),
    name: 'mortadha louhichi',
    imageUrl: '/static/images/products/a.png',
    updatedAt: subHours(Date.now(), 3)
  },
  {
    id: uuid(),
    name: 'skander nafti',
    imageUrl: '/static/images/products/a.png',
    updatedAt: subHours(Date.now(), 5)
  },
  
];

export const LatestProducts = (props) => (
  <Card {...props}>
    <CardHeader
      subtitle={`${products.length} in total`}
      title="employess of the month"
    />
    <Divider />
    <List>
      {products.map((product, i) => (
        <ListItem
          divider={i < products.length - 1}
          key={product.id}
        >
          <ListItemAvatar>
            <img
              alt={product.name}
              src={product.imageUrl}
              style={{
                height: 48,
                width: 48
              }}
            />
          </ListItemAvatar>
          <ListItemText
            primary={product.name}
            secondary={`Updated ${formatDistanceToNow(product.updatedAt)}`}
          />
          <IconButton
            edge="end"
            size="small"
          >
            <MoreVertIcon />
          </IconButton>
        </ListItem>
      ))}
    </List>
    <Divider />
    <Box
      sx={{
        display: 'flex',
        justifyContent: 'flex-end',
        p: 2
      }}
    >
      <Button
        color="primary"
        endIcon={<ArrowRightIcon />}
        size="small"
        variant="text"
      >
        View all
      </Button>
    </Box>
  </Card>
);
