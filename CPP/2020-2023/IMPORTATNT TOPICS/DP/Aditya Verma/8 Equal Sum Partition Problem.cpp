#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    int sum = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        sum+=arr[i];
    }

    if(sum % 2 != 0)
    {
        cout << "not possible" << endl;
        return;
    }

    sum/=2;
    bool up[n+1][sum + 1];

    for(int i = 0; i < n+1; i++)
    {
        for(int k = 0; k < sum+1; k++)
        {
            if(i == 0) up[i][k] = false;
            if(k == 0) up[i][k] = true;
        }
    }
    
    for(int i = 1; i < n+1; i++)
    {
        for(int k = 1; k < sum+1; k++)
        {
            if(k >= arr[i-1])
            {
                up[i][k] = up[i-1][k-arr[i-1]] || up[i-1][k];
            }
            else
                up[i][k] = up[i-1][k];
        }
    }

    if(up[n][sum]) cout << "possible" << endl;
    else cout << "Not possible" << endl;    
}

int32_t main()
{
    solve();
}


// 4
// 1 5 11 5
// possible


// 4
// 1 5 10 5
// not possible