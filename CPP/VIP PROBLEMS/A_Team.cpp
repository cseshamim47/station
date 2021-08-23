#include <iostream>
using namespace std;

int main()
{
    int n;
    cin >> n;
    int x,count[n] = {};
    int final = 0;
    for(int i = 0; i < n; i++){
        for(int j = 0; j<3; j++){
            cin >> x; 
            if(x==1) count[i]+=1;
            if(j==2){
                if(count[i]<2){
                    count[i]=0; 
                }else count[i]=1;
            }
        }
    }
    for(int i = 0; i < n; i++){
        final += count[i];
    }
    cout << final;
}