#include <iostream>
#include <cstring>
using namespace std;

int main()
{
    int n; 
    cin >> n;
   // char x[101]={};
   string x[n];
    for(int i = 0; i < n; i++){
        cin >> x[i]; 
    }
    
    for(int i = 0; i < n; i++){
        int  len = x[i].length();
        for(int j = 0; j<1; j++){
            char arr[len];
            strcpy(arr,x[i].c_str());
            if(len>10){
                cout << arr[0] << len-2 << arr[len-1];
                break;
            }else cout << x[i];
            
        }
        cout << endl;
    }

}