#include <iostream>
#include <vector>
using namespace std;

int main()
{
    int n;
    cin >> n;
    vector <vector <int> > vec(n, vector<int> (n,0));
    vector <vector <int> > transpose(n, vector<int> (n, 0));

    for(int i = 0; i < n; i++){
        for(int j = 0; j < n; j++){
            int t;
            cin >> t;
            vec[i][j] = t; 
        }
    }
    cout << '\n';

    for(int i = 0; i < n; i++){
        for(int j = 0; j < n; j++){
            cout << vec[i][j] << " ";
        }
        cout << "\n";
    }

    cout << "\nTranspose : " << "\n\n";

    for(int i = 0; i < n; i++){
        for(int j = 0; j < n; j++){
            transpose[i][j] = vec[j][i];
            // cout << transpose[i][j] << " ";
        }
    }

    for(int i = 0; i < n; i++){
        for(int j = 0; j < n; j++){
            cout << transpose[i][j] << " ";
        }
            cout << "\n";

    }
}