#include <stdio.h>
#include <stdlib.h>

struct node 
{
    int num;                        
    struct node *nextptr;           
}*stnode;

void createNodeList(int n); 
void displayList(); 
void deletefirst();       

int main()
{
    int n;
		printf("\n\n Linked List : To create and display Singly Linked List :\n");
		printf("-------------------------------------------------------------\n");
		
    printf(" Input the number of nodes : ");
    scanf("%d", &n);
    createNodeList(n);
    printf("after deleted first node:\n");
    deletefirst();
    printf("\n Data entered in the list : \n");
    displayList();
    return 0;
}
void createNodeList(int n)
{
    struct node *fnNode, *tmp;
    int num, i;
    stnode = (struct node *)malloc(sizeof(struct node));

    if(stnode == NULL) 
    {
        printf(" Memory can not be allocated.");
    }
    else
    {


        printf(" Input data for node 1 : ");
        scanf("%d", &num);
        stnode->num = num;      
        stnode->nextptr = NULL; 
        tmp = stnode;

        for(i=2; i<=n; i++)
        {
            fnNode = (struct node *)malloc(sizeof(struct node));
            if(fnNode == NULL)
            {
                printf(" Memory can not be allocated.");
                break;
            }
            else
            {
                printf(" Input data for node %d : ", i);
                scanf(" %d", &num);
 
                fnNode->num = num;     
                fnNode->nextptr = NULL; 
 
                tmp->nextptr = fnNode; 
                tmp = tmp->nextptr; 
            }
        }
    }
}
void deletefirst()
{
	
	struct node*temp;
	temp = root;
	root=root->link;
	free(temp);
}
}
void displayList()
{
    struct node *tmp;
    if(stnode == NULL)
    {
        printf(" List is empty.");
    }
    else
    {
        tmp = stnode;
        while(tmp != NULL)
        {
            printf(" %d->", tmp->num);      
            tmp = tmp->nextptr;                     
        }
    }
} 
