#include <bits/stdc++.h>
using namespace std;

int main()
{
    int t;
    cin >> t;

    while(t--){
        int n,sum=0;
        cin >> n;
        int size = n;
        while(n--){
            int x;
            cin >> x;
            sum += x;
        }
        if(sum < size) printf("%d\n",1);
        else if(sum > size) printf("%d\n",sum-size);
        else printf("%d\n",0);
    }
    
}