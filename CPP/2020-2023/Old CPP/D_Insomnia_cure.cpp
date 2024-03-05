#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{}

int main()
{
      //        Bismillah
    // w(t)
    int n;
    int arr[4];
    cin >> arr[0] >> arr[1] >> arr[2] >> arr[3] >> n;
    int k = n;
    int ans[n+1] = {0};
    ans[0] = 1;
    for(int i = 0; i < 4; i++)
    {
        int x = arr[i];
        if(x == 1)
        {
            cout << n << endl;
            return 0;
        }
        for(int m = x; m <= n; m+=x)
        {
            ans[m] = 1;
        } 
    }
    int cnt = 0;
    sort(ans,ans+n);
    for(int i = 0; i < n+1; i++)
    {
        if(ans[i] == 0) cnt++;
    }
    cout << n-cnt << endl;


}