#include <bits/stdc++.h>
using namespace std;

int main()
{
    int t,n;
    scanf("%d",&t);
    while(t--){
        scanf("%d",&n);
        long long int Sum = 0;
        long long int even = n / 2;
        even *= even + 1;
        long long int odd = n/2;  // 
        if(n%2 != 0) odd += 1;
        odd *= odd * 2;
        Sum = even+odd;
        printf("%ld\n",Sum);
    }
}
