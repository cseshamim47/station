#include <iostream>
using namespace std;

int main()
{
    int n;
    cin >> n;
    int arr[n];
    int ans[n];
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
    }
    for(int i = 1; i <= n; i++)
    {
        for(int j = 0; j <=n; j++)
        {
            if(arr[j]==i){
                ans[i-1]=j+1;
            }
        }

    }
    for(int i=0; i<n; i++)
    {
        cout << ans[i] << " ";
    }
}