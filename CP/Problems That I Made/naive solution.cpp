#include <bits/stdc++.h>
using namespace std;

int f(vector<int> &v)
{

    sort(v.begin(),v.end());

    int sum = v[0];
    for(int i = 1; i < v.size(); i++)
    {
        if(v[i] == v[i-1])
        {
            sum = 0;
            return sum;
        }else sum += v[i];
    }

    return sum;
}

void solve()
{
    
    int n;
    cin >> n;
    int a[n][n];
    for (int i = 0; i < n; i++)
    {
        for (int j = 0; j < n; j++)
        {
            cin >> a[i][j];
        }
    }
	if(n == 1)
	{
		cout << 1 << " " << a[0][0] << endl;
		return;
	}

    int mn = 1e8;
    for (int i = 0; i < n; i++)
    {
        for (int j = 0; j < n; j++)
        {
			if(n == 2)
			{
				vector<int> v;
				v.push_back(a[0][i]);
				v.push_back(a[1][j]);
				int pos = f(v);
				if(pos)
				{
					mn = min(mn,pos);
				}
				continue;
			}
            for (int k = 0; k < n; k++)
            {
                if(n == 3)
                {
                    vector<int> v;
                    v.push_back(a[0][i]);
                    v.push_back(a[1][j]);
                    v.push_back(a[2][k]);
                   	int pos = f(v);
					if(pos)
					{
						mn = min(mn,pos);
					}
                    continue;
                }
                for(int l = 0; l < n; l++)
                {
                    if(n == 4)
                    {
                        vector<int> v;
                        v.push_back(a[0][i]);
                        v.push_back(a[1][j]);
                        v.push_back(a[2][k]);
                        v.push_back(a[3][l]);
                        int pos = f(v);
						if(pos)
						{
							mn = min(mn,pos);
						}
                        continue;
                    }
					for (int m = 0; m < n; m++)
					{
						if(n == 5)
						{
							vector<int> v;
							v.push_back(a[0][i]);
							v.push_back(a[1][j]);
							v.push_back(a[2][k]);
							v.push_back(a[3][l]);
							v.push_back(a[4][m]);
							int pos = f(v);
							if(pos)
							{
								mn = min(mn,pos);
							}
							continue;
						}
					}
					
                }
            }
            
        }
        
    }

	int cnt = 0;
    for (int i = 0; i < n; i++)
    {
        for (int j = 0; j < n; j++)
        {
			if(n == 2)
			{
				vector<int> v;
				v.push_back(a[0][i]);
				v.push_back(a[1][j]);
				if(f(v) == mn)
				{
					cnt++;	
				}
				continue;
			}
            for (int k = 0; k < n; k++)
            {
                if(n == 3)
                {
                    vector<int> v;
                    v.push_back(a[0][i]);
                    v.push_back(a[1][j]);
                    v.push_back(a[2][k]);
                    if(f(v) == mn)
                    {
                        cnt++;
                    }
                    continue;
                }
                for(int l = 0; l < n; l++)
                {
                    if(n == 4)
                    {

                        vector<int> v;
                        v.push_back(a[0][i]);
                        v.push_back(a[1][j]);
                        v.push_back(a[2][k]);
                        v.push_back(a[3][l]);
                        if(f(v) == mn)
                        {
                            cnt++;
                        }
                        continue;
                    }

					for (int m = 0; m < n; m++)
					{
						if(n == 5)
						{
							vector<int> v;
							v.push_back(a[0][i]);
							v.push_back(a[1][j]);
							v.push_back(a[2][k]);
							v.push_back(a[3][l]);
							v.push_back(a[4][m]);
							if(f(v) == mn)
							{
								cnt++;
							}
							continue;
						}
					}
                }
            }
            
        }
        
    }

    if(mn == 1e8) mn = 0;
    
    cout << cnt << " " << mn << endl;
    

}

int32_t main()
{
    //    Bismillah
    int t = 1;
    cin >> t;
    while(t--) solve();
}


