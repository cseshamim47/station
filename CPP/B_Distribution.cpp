#include <bits/stdc++.h>
using namespace std;

#define ll long long
#define MAX 1000006

int main()
{
    int n;
    cin >> n;
    int handOver[n],get[n],ans[n] = {0};
    for(int i = 0; i < n; i++)
    {
        cin >> handOver[i];
    }
    int mini;
    int mm = INT_MAX;
    for(int i = 0; i < n; i++)
    {
        cin >> get[i];
        if(mm > get[i])
        {
            mm = get[i];
            mini = i;
        }
    }
    ans[mini] = get[mini];

    int k = mini;
    k++;
    k %= n;
    cout << k << endl;
    while(k != mini)
    {
        cout << (k-1+n)%n << endl;
        // getchar();
        ans[k] = min(ans[(k-1+n)%n]+handOver[(k-1+n)%n],get[k]);
        k++;
        k%=n;
    }
    
    for(auto i : ans) cout << i << endl;

}