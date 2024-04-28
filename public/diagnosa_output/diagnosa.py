# Import library
from roboflow import Roboflow
import json
import sys

def predict_image(image_path):
    # Initialize Roboflow with API key
    rf = Roboflow(api_key="Bq2XXC7KTm2QikWJXDdY")

    # Access the project and model
    project = rf.workspace().project("tilapia-diseases")
    model = project.version(1).model

    # Predict using the model
    result = model.predict(image_path, confidence=40, overlap=30).json()

    return result

# Main function to accept command line arguments
if __name__ == "__main__":
    # Redirect stdout to suppress debug messages
    sys.stdout = open(sys.stdout.fileno(), 'w', buffering=1)

    image_path = sys.argv[1]  # Get the image path from command line arguments
    result = predict_image(image_path)

    # Print JSON dump
    print(json.dumps(result))
