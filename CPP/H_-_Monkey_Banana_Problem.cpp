#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define N 500

int arr[N][N];
int Case;
void solve()
{
    int n;
    cin >> n;
    int rows = n*2-1;
    
    for(int i = 1; i <= n; i++)
    {
        for(int j = 1; j <= i; j++)
        {
            cin >> arr[i][j];
        }
        
    }
    int k = rows-n;
    for(int i = n+1; i <= rows; i++)
    {
        for(int j = 1; j <= k; j++)
        {
            cin >> arr[i][j];
        }
        k--;
    }
    

    for(int i = 1; i <= n; i++)
    {
        for(int j = 1; j <= i; j++)
        {
             arr[i][j] += max({arr[i-1][j],arr[i-1][j+1]});
        }
        
    }
    k = rows-n;
    for(int i = n+1; i <= rows; i++)
    {
        for(int j = 1; j <= k; j++)
        {
            
            arr[i][j] += max({arr[i-1][j],arr[i-1][j+1]});
        }
        k--;
    }

    // for(int i = 1; i <= n; i++)
    // {
    //     for(int j = 1; j <= i; j++)
    //     {
    //         cout << arr[i][j] << " ";
    //     }
    //     cout << endl;
        
    // }

    // k = rows-n;
    // for(int i = n+1; i <= rows; i++)
    // {
    //     for(int j = 1; j <= k; j++)
    //     {
    //         cout << arr[i][j] << " ";
    //     }
    //     cout << endl;
    //     k--;
    // }


    cout << "Case " << ++Case << ": " <<  arr[rows][1] << endl;
    
    memset(arr,0,sizeof(arr));

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}