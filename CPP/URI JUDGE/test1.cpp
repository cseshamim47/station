#include <iostream>
using namespace std;

int main()
{
    
    long long x;
    char c;
    long long o,e;
    long long sum[102]={};
    long long count=0;
    
    for(long long j =0;;j++){
       
        cin >> x;
         if(x!=0){
             for(long long i = 0; i<x; i++){
                if(i%2!=0 && i!=0){
                cin >> c;
                }
                cin >> o;
                if(c == '+' || i == 0){
                    sum[j] += o;
                }else if(sum[j]<=0 && c =='-'){
                    sum[j] += o;
                }else sum[j] -=o;
             }
             count++;
         }else break;
       
        
    }
    for(long long i = 0; i < count; i++){
        cout << "Teste " << i+1 << endl;
        cout << sum[i] << endl;
        cout << endl;
    }
}