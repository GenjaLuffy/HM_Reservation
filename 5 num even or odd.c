#include<stdio.h>
int main()
{
   int n[5],i,even,odd;
for(i=0;i<=5;i++){

printf("enter any 5 numbers[%d] :",i);
scanf("%d",&n[i]);
    if(n[i]%2==0){
        printf("even\n");
        even++;
    }
    else{
        printf("odd\n");
        odd++;
    }
}
return 0;
}

