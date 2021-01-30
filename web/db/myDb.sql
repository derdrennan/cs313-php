CREATE TABLE public.user (
  id SERIAL NOT NULL PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
);

CREATE TABLE public.recipeList (
  id SERIAL NOT NULL PRIMARY KEY,
  recipeTitle VARCHAR(100) NOT NULL,
  user_id INT NOT NULL REFERENCES public.user(id)
);

CREATE TABLE public.recipeInfo (
  id SERIAL NOT NULL PRIMARY KEY,
  url VARCHAR(400) NOT NOT NULL,
  userComment VARCHAR(500) NOT NULL,
  category VARCHAR(30) NOT NULL,
  cookTime VARCHAR(50) NOT NULL,
  difficulty VARCHAR(30) NOT NULL,
  recipeList_id INT NOT NULL REFERENCES public.recipeList(id)
);