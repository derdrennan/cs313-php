CREATE TABLE public.user (
  id SERIAL NOT NULL PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
);

ALTER TABLE public.user 
ADD email varchar(254);

ALTER TABLE public.user
ADD password varchar(250);

CREATE TABLE public.recipeList (
  id SERIAL NOT NULL PRIMARY KEY,
  recipetitle VARCHAR(100) NOT NULL,
  user_id INT NOT NULL REFERENCES public.user(id)
);

CREATE TABLE public.recipeInfo (
  id SERIAL NOT NULL PRIMARY KEY,
  url VARCHAR(400) NOT NULL,
  userComment VARCHAR(500) NOT NULL,
  category VARCHAR(30) NOT NULL,
  cookTime VARCHAR(50) NOT NULL,
  difficulty VARCHAR(30) NOT NULL,
  recipeList_id INT NOT NULL REFERENCES public.recipeList(id)
);