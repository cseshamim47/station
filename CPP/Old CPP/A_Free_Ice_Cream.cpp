#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n,iice,count = 0;
    long long sum = 0;
    cin >> n >> iice;
    sum = iice;
    pair<char,int>pr[n];

    for(int i = 0; i < n; i++){
        char ch;
        long long int x;
        cin >> ch >> x;
        pr[i] = make_pair(ch,x);
        if(ch=='-' && sum < x){
            count++;
            continue;
        }
        if(ch == '+') sum += x;
        if(ch == '-') sum -= x;
    }
    printf("%lld %d",sum,count);

    
}