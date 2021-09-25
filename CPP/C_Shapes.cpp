#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006
int cnt = 1;
void rotate(char *arr,int n)
{
    for(int i = 0; i < n; i++)
    {
        for(int j = i; j < n; j++)
        {
            swap(*((arr+i*n) + j), *((arr+j*n) + i));
        }
    }
    
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n/2; j++)
        {
            swap(*((arr+i*n) + j), *((arr+i*n) + n-j-1));
        }
    }
    cnt++;
}

void solve()
{
    int n;
    cin >> n;
    char a[n][n];
    char b[n][n];
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            cin >> a[i][j];
        }
    }

    int btopi = INT_MAX,btopj = INT_MAX,bboti = INT_MIN,bbotj = INT_MIN;
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            cin >> b[i][j];
            if(b[i][j] == '#')
            {
                btopi = min(btopi,i);
                btopj = min(btopj,j);
                bboti = max(bboti,i);
                bbotj = max(bbotj,j);
            }
        }
    }
    
    int rot = 4;
    while(rot--)
    {
        int atopi = INT_MAX,atopj = INT_MAX,aboti = INT_MIN,abotj = INT_MIN;
        for(int i = 0; i < n; i++)
        {
            for(int j = 0; j < n; j++)
            {
                if(a[i][j] == '#')
                {
                    atopi = min(atopi,i);
                    atopj = min(atopj,j);
                    aboti = max(aboti,i);
                    abotj = max(abotj,j);
                }
            }
        }
        int arow = aboti-atopi;
        int acol = abotj-atopj;
        int brow = bboti-btopi;
        int bcol = bbotj-btopj;
        if(arow == brow && acol == bcol)
        {
            bool match = true;
            int bi = btopi;
            int bj = btopj;
            for(int i = atopi; i <= aboti; i++)
            {
                for(int j = atopj; j <= abotj; j++)
                {
                    if(a[i][j] != b[bi][bj])
                    {
                        match = false;
                        break;
                    } 
                    bj++;
                }
                bi++;
                bj = btopj;
            }
            if(match == true)
            {
                cout << "Yes" << endl;
                return;
            } 
        }       
        rotate((char*)a,n);
    }
    cout << "No" << endl;
    
}

int32_t main()
{
    solve();    
}
